import openpyxl
import sys
from twilio.rest import Client
from datetime import datetime
import pandas as pd
import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart
from email.mime.application import MIMEApplication
from os.path import basename

account_sid = 'ACffd2fce359a976ec9b7eb4544bb503fd'
auth_token = '8907db481180c1ff11a26faaba44746e'
client = Client(account_sid, auth_token)

phoneNum = ''
email = ''
spendLimit = ''
loginSuccess = False

def register():
    username = input('Please enter your desired username: ')
    file = open('passwd.txt', 'r')
    taken = False
    userMatch = []
    for line in file:
        userMatch = line.split()
        print(userMatch)
        if (userMatch[0] == username):
            taken = True
            break
    if (taken == True):
        print("Sorry, that username has been taken. Please try again")
        register()
    else:
        global loginSuccess
        global phoneNum
        global email
        global spendLimit
        password = input('Please enter your desired password: ')
        phoneNum = input('Please enter your phone number: ')
        email = input('Please enter your email address: ')
        spendLimit = input("Please enter your monthly spending limit: ")
        file = open('passwd.txt', 'a')
        file.write(username)
        file.write(" ")
        file.write(password)
        file.write(" ")
        file.write(phoneNum)
        file.write(" ")
        file.write(email)
        file.write(" ")
        file.write(spendLimit)
        file.write("\n")
        file.close()
        phoneNum = userMatch[2]
        email = userMatch[3]
        spendLimit = userMatch[4]
        loginSuccess = True
        mainMenu()

def login():
    print("Please Log In")
    username = input("Please enter your username: ")
    password = input("Please enter your password: ")
    login_info = []
    for line in open('passwd.txt', 'r'):
        login_info = line.split()
        print(line)
        print(login_info)
        if (username == login_info[0] and password == login_info[1]):
            print("You are now logged in")
            print("\n")
            global loginSuccess
            global phoneNum
            global email
            global spendLimit
            phoneNum = login_info[2]
            email = login_info[3]
            spendLimit = login_info[4]
            loginSuccess = True
            mainMenu()
        else:
            print("Incorrect credentials. Please try again.")
            login()

def recordExpense():
    item = input("Please enter the item you purchased: ")
    price = input("Please enter the cost of " + item + ": ")
    date = input("Please enter the date of purchase (MM-DD-YY): ")
    wb = openpyxl.load_workbook("Book1.xlsx")
    ws = wb.worksheets[0]
    newRow = ws.max_row + 1
    dateRow = ws.cell(row=newRow, column=1)
    itemRow = ws.cell(row=newRow, column=2)
    costRow = ws.cell(row=newRow, column=3)
    dateRow.value = str(date)
    itemRow.value = str(item)
    costRow.value = str(price)
    done = False
    while (done == False):
        response = input("Your purchase has been recorded. Record another purchase? (Y/N): ")
        if (response == 'Y'):
            done = True
            recordExpense()
        elif (response == 'N'):
            done = True
            wb.save("Book1.xlsx")
            global loginSuccess
            loginSuccess = True
            mainMenu()
        else:
            print("please enter a valid response.")
            done = False

def sendEmail(send_from: str, subject: str, text: str, send_to: list, files=None):

    username = 'zee_hussain@utexas.edu'
    password = '#Buttley4Lyfe'

    send_to= send_to

    msg = MIMEMultipart()
    msg['From'] = send_from
    msg['To'] = ', '.join(send_to)
    msg['Subject'] = subject

    msg.attach(MIMEText(text))

    for f in files or []:
        with open(f, "rb") as fil:
            ext = f.split('.')[-1:]
            attachedfile = MIMEApplication(fil.read(), _subtype = ext)
            attachedfile.add_header(
                'content-disposition', 'attachment', filename=basename(f) )
        msg.attach(attachedfile)

    date = datetime.today()
    firstDate = date.today().replace(day=1)

    if (date == firstDate):
        smtp = smtplib.SMTP(host="smtp.gmail.com", port=587)
        smtp.starttls()
        smtp.login(username, password)
        smtp.sendmail(send_from, send_to, msg.as_string())
        smtp.close()

def sendText():
    wb = openpyxl.load_workbook("Book1.xlsx")
    ws = wb.worksheets[0]
    global spendLimit
    sum = 0
    for i in range(2,ws.max_row+1):
        costRow = ws.cell(row=i, column=3)
        sum = sum + float(costRow.value)
    if sum > float(spendLimit):
        message = client.messages \
            .create(
            body="You have exceeded your monthly spending limit of "+spendLimit,
            from_='+19495229115',
            to='+1'+phoneNum
        )

def viewExpenses():
    df = pd.read_excel('Book1.xlsx')
    with pd.option_context('display.max_rows', None, 'display.max_columns', None):
        print(df)
        print("\n")
    mainMenu()

def mainMenu():
    global loginSuccess
    if loginSuccess == True:
        print("Main Menu:")
        print("Please select an option by pressing the corresponding button")
        print("\n")
        print("To record an expense, please press: 1")
        print("To view your monthly expense report: 2")
        print("To exit: 3")
        print("\n")
        username = 'zee_hussain@utexas.edu'
        sendEmail(send_from=username, subject="Monthly Expense Report",
                  text="Dear " + username + ",\n\nHere is your monthly expense report.\n\nBest,\n\nExpenseBot",
                  send_to=[email], files=[r"C:\Users\zee_h\PycharmProjects\SWE\Book1.xlsx"])
        sendText()
        optionSelect = input()
        if optionSelect == '1':
            recordExpense()
        elif optionSelect == '2':
            viewExpenses()
        elif optionSelect == '3':
            sys.exit(0)

    else:
        checkUser = input("Welcome to Expense Tracker. Press R to register, and L to login: ")
        if (checkUser == 'R'):
            register()
            loginSuccess = True
        elif (checkUser == 'L'):
            login()
        else:
            mainMenu()

def main():
    mainMenu()

main()
