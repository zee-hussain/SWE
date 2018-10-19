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
from tkinter import*


account_sid = 'ACffd2fce359a976ec9b7eb4544bb503fd'
auth_token = '8907db481180c1ff11a26faaba44746e'
client = Client(account_sid, auth_token)

phoneNum = ''
email = ''
spendLimit = ''
loginSuccess = False



def checkIsInteger(x):
    try:
        int(x)
        return True
    except ValueError:
        return False

def checkTitleNoInt(x):
    testString = str(x)
    for i in x:
        if i.isdigit() == True:
            return False
            break
    else:
        i+=1
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
    global loginSuccess
    global phoneNum
    global email
    global spendLimit
    print("Please Log In")
    username = input("Please enter your username: ")
    password = input("Please enter your password: ")
    login_info = []
    loginSuccess = False
    for line in open('passwd.txt', 'r'):
        login_info = line.split()
        if (username == login_info[0] and password == login_info[1]):
            print("You are now logged in")
            print("\n")

            phoneNum = login_info[2]
            email = login_info[3]
            spendLimit = login_info[4]
            loginSuccess = True
            mainMenu()
    if loginSuccess == False:
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
                  send_to=[email], files=[r"Book1.xlsx"])
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
#don't need this function, but just incase we want to create a window, here is a good reference
def createNewWindow():
    recordExpense = Toplevel()
    recordExpense.geometry("500x500")
    Label(recordExpense, text = "Name of Item: ").grid(row = 0)
    Label(recordExpense, text = "Price of item: ").grid(row = 1)
    #when you create the textbox, you need to define the variable to link it to in order to retrieve it
    nameItem = Entry(recordExpense, textvariable = nameItem_value)
    price = Entry(recordExpense, textvariable = price_value)

    nameItem.grid(row = 0, column = 1)
    price.grid(row = 1, column = 1)

    saveButton = Button(recordExpense, text = "Job's Done", fg = "Blue", bg = "Grey", command = checkIsInteger(str(price_value.get())) and recordExpense)
    saveButton.grid(row = 2, column = 1)
    
    recordExpense.mainloop()

#creates a blank window
#every GUI has to have this and mainloop
mainWindow = Tk()
#sets size of window at start up
mainWindow.geometry("500x500")
#makes window unable to be resized by users
mainWindow.resizable(width = False, height = False)
#to populate the window with a label, create using Label(location, x)
#pack(fill =x) button will stretch however long window is stretched (left and right)
#replace above with y, will stretch height wise
#fill = BOTH, expand = True, will dynamically change both x and y
appTitle = Label(text = "Expense Calculator", bg = "Grey", fg = "White")
#when you don't care where the object is placed, but you just want it display in window
appTitle.pack(fill = BOTH, expand = True)
#creating containers to place windows or widgets or objects in seperate areas of the entire screen  
topFrame = Frame(mainWindow)
topFrame.pack(side = TOP)

bottomFrame = Frame(mainWindow)
bottomFrame.pack(side = BOTTOM)

#defining variables
nameItem_value = StringVar()
price_value = StringVar()

#creation of button: Button(location, text, fg = (text color)) or bg = background color
quitButton = Button(text = "Quit", fg = "blue", bg = "Grey", command = quit)
recordButton = Button(text = "Record Expenses", fg = "red",bg= "Grey", command = createNewWindow)
displayButton = Button(text = "Display Expenses", fg = "red",bg= "Grey", command = viewExpenses)
#by default, pack stacks objects on top of one another. 
#define side = to specify where on window you want

recordButton.pack(in_ = topFrame, side = LEFT)
quitButton.pack(in_ = topFrame, side = RIGHT)
displayButton.pack(in_ = topFrame, side = LEFT)

#place window in infinite loop, keeps it displayed, until you press close
mainWindow.mainloop()

