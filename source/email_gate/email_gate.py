import configparser
import imaplib
import email
from smtplib import SMTP_SSL, SMTP_SSL_PORT
import requests
from icecream import ic

def ping():
    return("PONG!!")

def speakerLog():
    speakerpi = config['DEFAULT']['speakerpi_url']
    api_url = f"{speakerpi}/log/"
    return(requests.get(api_url).text)

def speakerCron():
    speakerpi = config['DEFAULT']['speakerpi_url']
    api_url = f"{speakerpi}/cron/"
    return(requests.get(api_url).text)

def speakerList():
    speakerpi = config['DEFAULT']['speakerpi_url']
    api_url = f"{speakerpi}/list_stations/"
    return(requests.get(api_url).text)

def speakerMute():
    speakerpi = config['DEFAULT']['speakerpi_url']
    api_url = f"{speakerpi}/mute/"
    return(requests.post(api_url).text)

def speakerAmbient():
    speakerpi = config['DEFAULT']['speakerpi_url']
    api_url = f"{speakerpi}/play_station/ambient1/"
    return(requests.post(api_url).text)

#########################################################
# Main - Implementation
#########################################################
def main (functionDictionary):
    imap_server = config['DEFAULT']['imap_server']
    imap_password = config['DEFAULT']['imap_password']
    gate_email = config['DEFAULT']['gate_email']

    SMTP_HOST = config['DEFAULT']['smtp_server']
    SMTP_USER = config['DEFAULT']['gate_email']
    SMTP_PASS = config['DEFAULT']['smtp_password']
    gate_email = config['DEFAULT']['gate_email']
    sms_email = config['DEFAULT']['sms_email']
    gate_email_body = config['DEFAULT']['gate_email_body']
    gate_email_subject = config['DEFAULT']['gate_email_subject']

    # Connect to inbox
    imap_server = imaplib.IMAP4_SSL(host=imap_server)
    imap_server.login(gate_email, imap_password)
    imap_server.select()  # Default is `INBOX`


    # Craft the email
    from_email = f'<{gate_email}>'  
    to_emails = [f'{sms_email}']
    body = f"{gate_email_body}"
    headers = f"From: {gate_email}\r\n"
    headers += f"To: {', '.join(to_emails)}\r\n"
    headers += f"Subject: {gate_email_subject}\r\n"


    # Find all emails in inbox and print out the raw email data
    _, message_numbers_raw = imap_server.search(None, 'ALL')
    sms_request = ""
    sms_response = ""
    for message_number in message_numbers_raw[0].split():
        _, msg = imap_server.fetch(message_number, '(RFC822)')
    
        message = email.message_from_bytes(msg[0][1])

        if message.is_multipart():
            multipart_payload = message.get_payload()
            for sub_message in multipart_payload:
                sms_request = sub_message.get_payload()
                ic(f"multipart: {sms_request}")
        else:  # Not a multipart message, payload is simple string
            sms_request = message.get_payload()
            ic(f"single: {sms_request}")

        # Delete an email
        imap_server.store(message_number, '+FLAGS', '\Deleted')


    # Expunge after marking emails deleted
    imap_server.expunge()

    sms_request_parts = sms_request.lower().strip().split()
    ic(sms_request_parts)
    sms_request_function = '_'.join(sms_request_parts)
    ic(sms_request_function)
    if sms_request_function not in functionDictionary:
        ic(sms_request_function, "Not found.")
        return

    sms_response = functionDictionary[sms_request_function]()
    body = f"ack {sms_response}"
    ic(body)
    email_message = headers + "\r\n" + body  # Blank line needed between headers and body
    # Connect, authenticate, and send mail
    smtp_server = SMTP_SSL(SMTP_HOST, port=SMTP_SSL_PORT)
    smtp_server.set_debuglevel(0)  # Set to 1 to show SMTP server interactions
    smtp_server.login(SMTP_USER, SMTP_PASS)
    smtp_server.sendmail(from_email, to_emails, email_message)
    # Disconnect
    smtp_server.quit()

#########################################################
# Main()
#########################################################

if __name__ == "__main__" :
    # Read configuration file
    config = configparser.ConfigParser()
    config.read('/home/pi/email_gate/email_gate.cfg')

    functionDict = {
            "ping"                  : ping,
            "speaker"               : speakerLog,
            "speaker_log"           : speakerLog,
            "speaker_cron"          : speakerCron,
            "speaker_list"          : speakerList,
            "speaker_stations"      : speakerList,
            "speaker_play_ambient"  : speakerAmbient,
            "play_ambient"          : speakerAmbient,
            "speaker_ambient"       : speakerAmbient,
            "mute"                  : speakerMute,
            "speaker_mute"          : speakerMute,
        }

    main(functionDict)
