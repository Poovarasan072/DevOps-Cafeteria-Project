pipeline {
    agent any

    environment {
        IMAGE_NAME = "poovarasans072/cafeteria-app"
        K8S_DEPLOYMENT_FILE = "k8s-deployment.yaml"
    }

    stages {

        stage('Checkout Code') {
            steps {
                checkout scm
            }
        }

        stage('Build Docker Image') {
            steps {
                // Build Docker image locally
                bat "docker build -t cafeteria-app ."
            }
        }

        stage('Tag Docker Image') {
            steps {
                bat "docker tag cafeteria-app %IMAGE_NAME%:latest"
            }
        }

        stage('Docker Hub Login') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'dockerhub-cred', usernameVariable: 'DOCKER_USER', passwordVariable: 'DOCKER_PASS')]) {
                    bat 'docker login -u %DOCKER_USER% -p %DOCKER_PASS%'
                }
            }
        }

        stage('Push Image to Docker Hub') {
            steps {
                bat "docker push %IMAGE_NAME%:latest"
            }
        }

        stage('Deploy to Kubernetes') {
            steps {
                // Apply Kubernetes deployment YAML
                bat "kubectl apply -f %K8S_DEPLOYMENT_FILE%"
            }
        }

    }

    post {
        success {
            echo 'Pipeline completed successfully! Your app is running in Kubernetes.'
        }
        failure {
            echo 'Pipeline failed. Check the console output for errors.'
        }
    }
}