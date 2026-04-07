pipeline {
    agent any

    stages {

        stage('Build Docker Image') {
            steps {
                bat 'docker build -t cafeteria-app .'
            }
        }

        stage('Tag Image') {
            steps {
                bat 'docker tag cafeteria-app poovarasans072/cafeteria-app:latest'
            }
        }

        stage('Push Image to Docker Hub') {
            steps {
                bat 'docker push poovarasans072/cafeteria-app:latest'
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
