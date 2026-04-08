# 🎤 Speako – AI English Speaking Practice Tool

Speako is an AI-powered web application that helps users improve their English speaking skills through real-time voice analysis, scoring, and practice — just like Monkeytype, but for speaking! 🚀

---

## 🌟 Features

- 🎤 Voice Recording (Speech-to-Text)
- 📄 Random Paragraph Practice
- 📊 Accuracy, Fluency & Grammar Score
- 🔊 US Accent Listening Mode
- 🔁 Practice & Repeat System
- 💾 Save Results in Database
- ⚡ Fast & Lightweight

---

## 🧠 How It Works

1. Click Start → Get a random paragraph  
2. Click Speak → Read aloud  
3. Click Stop → Finish recording  
4. Click Submit → Get your score  
5. Practice daily to improve 🔥  

---

## 🛠️ Tech Stack

- HTML, CSS, JavaScript  
- PHP (Backend API)  
- MySQL (Database)  
- Web Speech API  

---

## 📁 Project Structure

speako/
│

├── index.html

├── assets/

│   ├── css/

│   ├── js/

│   └── images/

│

├── backend/

│   ├── api/

│   ├── models/

│   ├── helpers/

│   └── config.php

│

├── data/

├── logs/

└── README.md

---

## 🚀 Installation (Local Setup)

git clone https://github.com/kuldeeppatel2304/speako.git

cd speako

Move project to xampp/htdocs/

Start Apache & MySQL

Open: http://localhost/speako

---

## 🗄️ Database Setup (SQL)

CREATE DATABASE speako;
USE speako;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(150) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE paragraphs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    difficulty ENUM('easy', 'medium', 'hard') DEFAULT 'easy',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    paragraph_id INT,
    spoken_text TEXT,
    accuracy FLOAT,
    fluency FLOAT,
    grammar_score FLOAT,
    total_score FLOAT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO paragraphs (content, difficulty) VALUES
("Practice speaking English every day to improve your fluency.", "easy"),
("Consistency is the key to mastering any skill in life.", "medium"),
("Artificial intelligence is transforming the way humans interact with technology.", "hard");

---

## ⚠️ Notes

- Use Chrome browser  
- Allow microphone permission  
- HTTPS recommended  

---

## 👨‍💻 Author

Kuldeep Patel

---

## ⭐ Support

Give a star on GitHub!
