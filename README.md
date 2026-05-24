# Cafeteria Ordering System

## Project Overview

The **Cafeteria Ordering System** is a web-based application developed to automate and streamline the food ordering process within a cafeteria environment. The system provides a digital platform where customers can browse food items, place orders, track order status, and cancel orders when necessary, while managers can efficiently manage food items, update order statuses, and control limited-quantity offers.

By replacing the traditional manual system with an automated solution, the system reduces waiting time, minimizes human errors, improves inventory control, and enhances overall user experience.

---

# Features

## Customer Module
- User Registration and Login
- Browse Food Items
- Add Items to Cart
- Place Orders
- Cancel Orders
- Track Order Status

## Manager Module
- Add Food Items
- Manage Orders
- Enable/Disable Food Availability
- Offer Management

## Offer Management
- Limited Quantity Offers
- Automatic Quantity Reduction
- Auto Removal of Expired Offers

---

# Technologies Used

| Technology | Description |
|---|---|
| PHP | Backend development |
| MySQL | Database management |
| HTML | Webpage structure |
| CSS | Styling |
| Bootstrap | Responsive UI |
| JavaScript | Client-side scripting |
| Docker | Containerization |
| Kubernetes | Container orchestration |
| Jenkins | CI/CD automation |
| GitHub | Version control |
| Minikube | Local Kubernetes cluster |

---

# Deployment Architecture

The deployment architecture follows a containerized DevOps workflow using Docker, Kubernetes, Jenkins, and GitHub.

1. Developer pushes code to GitHub
2. Jenkins triggers CI/CD pipeline
3. Docker image is built
4. Image is pushed to Docker Hub
5. Kubernetes deploys the application
6. Services provide load balancing
7. Autoscaling handles user traffic
8. Rollback restores previous stable version during failures

---

# How to Run the Project

## Step 1 — Clone Repository

```bash
git clone https://github.com/your-username/your-repository.git
cd your-repository
```

---

## Step 2 — Start Minikube

```bash
minikube start
```

---

## Step 3 — Build Docker Image

```bash
docker build -t cafeteria-app .
```

---

## Step 4 — Start Containers

```bash
docker-compose up -d
```

---

## Step 5 — Import Database

```bash
docker exec -i foodorder_db mysql -u root -proot123 foodorder < foodorder.sql
```

---

## Step 6 — Deploy to Kubernetes

```bash
kubectl apply -f deployment.yaml
kubectl apply -f service.yaml
```

---

## Step 7 — Verify Pods

```bash
kubectl get pods
```

---

## Step 8 — Access Application

```bash
minikube service cafeteria-service
```

---

# Scaling the Application

## Manual Scaling

```bash
kubectl scale deployment cafeteria-deployment --replicas=5
```

## Auto Scaling

```bash
kubectl autoscale deployment cafeteria-deployment --cpu-percent=50 --min=2 --max=5
```

---

# Rollback Deployment

```bash
kubectl rollout undo deployment cafeteria-deployment
```

---

# Results

- Successful user registration and ordering
- Controlled offer management
- Autoscaling support
- Load balancing across pods
- Automatic rollback handling
- Efficient order tracking

---

# Conclusion

The Cafeteria Ordering System successfully automates cafeteria operations using modern web technologies and DevOps tools. The project improves scalability, reliability, user experience, and deployment automation through Docker, Kubernetes, Jenkins, and GitHub integration.
