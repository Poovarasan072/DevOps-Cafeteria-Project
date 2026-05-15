pipeline {
    agent any

    environment {
        // Docker image name
        DOCKER_IMAGE = 'poovarasans072/cafeteria-app:latest'
        // Kubernetes deployment YAML file
        K8S_YAML = 'k8s-deployment.yaml'
        // Path to kubeconfig file on Jenkins server
        KUBECONFIG_PATH = 'C:\\Users\\Poovarasan S\\.kube\\config'
    }

    stages {
        stage('Checkout Code') {
            steps {
                echo "Checking out code from Git..."
                checkout scm
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    echo "Building Docker image: ${DOCKER_IMAGE}"
                    bat "docker build -t ${DOCKER_IMAGE} ."
                }
            }
        }

        stage('Docker Hub Login & Push') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'dockerhub-cred', usernameVariable: 'DOCKER_USER', passwordVariable: 'DOCKER_PASS')]) {
                    script {
                        echo "Logging into Docker Hub..."
                        bat """
                        docker login -u %DOCKER_USER% -p %DOCKER_PASS%
                        docker push ${DOCKER_IMAGE}
                        """
                    }
                }
            }
        }

        stage('Deploy to Kubernetes') {
            steps {
                script {
                    echo "Deploying to Kubernetes..."

                    bat """
                    set KUBECONFIG=${KUBECONFIG_PATH}

                    if exist ${K8S_YAML} (

                        kubectl apply -f ${K8S_YAML}

                        echo Checking rollout status...

                        kubectl rollout status deployment/cafeteria-deployment --timeout=60s

                        REM ===================================================
                        REM ROLLBACK FEATURE
                        REM If deployment fails, Kubernetes restores
                        REM previous stable version automatically
                        REM ===================================================

                        if %ERRORLEVEL% NEQ 0 (
                            echo Deployment failed! Rolling back...

                            kubectl rollout undo deployment/cafeteria-deployment

                            exit /b 1
                        )

                        echo Cafeteria app deployed successfully!

                    ) else (

                        echo Error: ${K8S_YAML} not found!
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