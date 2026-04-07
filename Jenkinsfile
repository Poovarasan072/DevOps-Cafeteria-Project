pipeline {
    agent any

    environment {
        // Jenkins credentials for Docker Hub
        DOCKER_HUB_CREDENTIALS = credentials('dockerhub-cred') // Replace with your Jenkins Docker credentials ID
        // Docker image name
        DOCKER_IMAGE = 'poovarasans072/cafeteria-app:latest'
        // Kubernetes deployment YAML file
        K8S_YAML = 'k8s-deployment.yaml'
        // Path to kubeconfig file on Jenkins server (adjust if needed)
        KUBECONFIG_PATH = 'C:\\ProgramData\\Jenkins\\.jenkins\\workspace\\Cafeteria-Project\\.kube\\config'
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
                    // Login to Docker Hub using credentials
                    bat """
                    echo %DOCKER_HUB_CREDENTIALS_PSW% | docker login -u %DOCKER_HUB_CREDENTIALS_USR% --password-stdin
                    """
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
                    // Set KUBECONFIG and deploy
                    bat """
                    set KUBECONFIG=${KUBECONFIG_PATH}
                    if exist ${K8S_YAML} (
                        kubectl apply -f ${K8S_YAML}
                        kubectl rollout status deployment/cafeteria-deployment
                        echo "Cafeteria app deployed successfully!"
                    ) else (
                        echo "Error: ${K8S_YAML} not found!"
                        exit /b 1
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