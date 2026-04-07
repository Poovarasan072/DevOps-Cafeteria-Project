pipeline {
    agent any

    stages {

        stage('Build Docker Image') {
            steps {
                bat 'docker build -t cafeteria-app .'
            }
        }

        stage('Run Docker Containers') {
            steps {
                bat 'docker compose down'
                bat 'docker compose up -d --build'
            }
        }

    }
}