from pandas import DataFrame
import pandas as pd
import time
import random
from random import shuffle

def main():
	#define Variables
	score = 0
	computerScore = 0
	placement = 0
	playerList =[]
	#Host input name to make personal
	"""name = input("Enter your name: ")
	print("Welcome",name,"to the Best Game Ever")"""
	#read excel file, let user decide which question list they wanna use
	questionListName = input("Enter the name of the question file you are using.")
	fileName = r'{}.xlsx'.format(questionListName)
	df = pd.read_excel(fileName)
	print(time.time())
	

	#Decide how many players are playing
	ready = False
	#Decide who goes first
	while ready == False: 
		name = input("Enter your name: ")
		playerList.append({"Name": name, "Score: ": 0})
		book = input("Do you want to add anymore players? (y/n)")
		if book == "y":
			continue
		else:
			ready = True

	#randomize players so everyone gets a fair chance
	shuffle(playerList)
	listLength = len(playerList)
	#placeholder
	beginning = 0
	#goes through row by row reading questions

	for questions in df['Questions']:


		print(playerList[beginning]["Name"],"it is your turn. Here is your question: ")
		print(questions)
		#asks user to input their answer
		userAnswer = input("Answer: ").lower()
		start = time.time()
		end = 0
		#Check if user answer matches question answer
		if userAnswer == df['Answers'][placement]:
			end = time.time()
			if end-start> 5:
				print("Too slow, computer has answered")
				print("1")
				computerScore+=1
			else:
				print("Correct!")
				print(df['Answers'][placement])
				playerList[beginning]["Score: "] +=1
			placement+=1
		else:
			if end-start> 5:
				print("Too slow, computer has answered")
				print("2")
				computerScore+=1
			else:
				print("Incorrect")
				print("Correct answer is: ",df['Answers'][placement])
			placement+=1
		if beginning != len(playerList) -1:
			beginning+=1
		else:
			beginning = 0
	print("Game Over.")
	print("The final scores are: ")
	for i in playerList:

		print(i["Name"], end ="")
		print(":", i["Score: "])
	#finding winner
	highestScore = 0
	winnerList = []
	for j in range(0,len(playerList)):
		if int(playerList[j]["Score: "]) > highestScore:
			winnerList.clear()
			highestScore = int(playerList[j]["Score: "])
			winnerList.append(playerList[j]["Name"])
		elif int(playerList[j]["Score: "]) == highestScore:
			winnerList.append(playerList[j]["Name"])
		else:
			continue
	if len(winnerList) > 1:

		print("It was a tie between: ",end= "")
		count = 0
		for i in winnerList: 
			print(i, end = "")
			if count < len(winnerList)-1:
				print(" and ", end= "")
				count += 1
	else:
		print("The winner is: ",winnerList[0])
main()