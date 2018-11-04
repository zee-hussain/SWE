from pandas import DataFrame
import pandas as pd
import time

def main():
	#define Variables
	score = 0
	computerScore = 0
	placement = 0
	#Host input name to make personal
	name = input("Enter your name: ")
	print("Welcome",name,"to the Best Game Ever")
	#read excel file
	fileName = r'questionList.xlsx'
	df = pd.read_excel(fileName)
	print(time.time())
	#goes through row by row reading questions
	for questions in df['Questions']:
		start = time.time()
		print(questions)
		#asks user to input their answer
		userAnswer = input("Answer: ")
		end = time.time()
		print(end)
		#Check if user answer matches question answer
		if userAnswer == df['Answers'][placement]:
			end = time.time()
			if end-start> 5:
				print("Too slow, computer has answered")
				computerScore+=1
			else:
				print("Correct!")
				print(df['Answers'][placement])
				score+=1
			placement+=1
		else:
			if end-start> 5:
				print("Too slow, computer has answered")
				computerScore+=1
			else:
				print("Incorrect")
				print("Correct answer is: ",df['Answers'][placement])
			placement+=1

	print("Game Over.")
	print("The final score is: ")
	print(name,":",score,"       ","Computer:",computerScore)
	if score>computerScore:
		print("You win!!!")
	if score<computerScore:
		print("Try again next time")
	else:
		print("TIE!!!")
main()