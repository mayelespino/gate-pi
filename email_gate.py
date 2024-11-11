import configparser
import imaplib
import email
from smtplib import SMTP_SSL, SMTP_SSL_PORT

# Read configuration file
config = configparser.ConfigParser()
config.read('/home/pi/email_gate/email_gate.cfg')
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
    else:  # Not a multipart message, payload is simple string
         sms_request = message.get_payload()

    # Delete an email
    imap_server.store(message_number, '+FLAGS', '\Deleted')


# Expunge after marking emails deleted
imap_server.expunge()

print(f'\n=>{sms_request}')
sms_response = sms_request.strip()

if sms_response != "":
    body = f"ack {sms_request}"
    email_message = headers + "\r\n" + body  # Blank line needed between headers and body
    # Connect, authenticate, and send mail
    smtp_server = SMTP_SSL(SMTP_HOST, port=SMTP_SSL_PORT)
    smtp_server.set_debuglevel(0)  # Set to 1 to show SMTP server interactions
    smtp_server.login(SMTP_USER, SMTP_PASS)
    smtp_server.sendmail(from_email, to_emails, email_message)
    # Disconnect
    smtp_server.quit()
