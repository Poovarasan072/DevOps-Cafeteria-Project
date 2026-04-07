pipeline {
    agent any

    environment {
        DOCKER_HUB_CREDENTIALS = credentials('docker-hub-cred') // Replace with your Jenkins Docker credentials ID
        DOCKER_IMAGE = 'poovarasans072/cafeteria-app:latest'
        K8S_YAML = 'k8s-deployment.yaml' // Ensure this file exists in your repo
    }

    stages {
        stage('Checkout Code') {
            steps {
                checkout scm
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    bat "docker build -t ${DOCKER_IMAGE} ."
                }
            }
        }

        stage('Docker Hub Login') {
            steps {
                script {
                    bat "docker login -u ${DOCKER_HUB_CREDENTIALS_USR} -p ${DOCKER_HUB_CREDENTIALS_PSW}"
                }
            }
        }

        stage('Push Docker Image') {
            steps {
                script {
                    bat "docker push ${DOCKER_IMAGE}"
                }
            }
        }

        stage('Deploy to Kubernetes') {
            steps {
                script {
                    // Check if YAML file exists before applying
                    bat """
                    if exist ${K8S_YAML} (
                        kubectl apply -f ${K8S_YAML}
                        kubectl rollout status deployment/cafeteria-deployment
                    ) else (
                        echo "Error: ${K8S_YAML} not found!"
                        exit 1
                    )
                    """
                }
            }
        }
    }

    post {
        success {
            echo "Pipeline completed successfully!"
        }
        failure {
            echo "Pipeline failed. Check logs for details."
        }
    }
}