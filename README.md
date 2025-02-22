# Test project based on Yii2 Basic with docker

This project is a test project from Valeriia with love
---

##  Features

- PHP 8.3 with FPM
- Nginx as a web server
- Docker Compose
- Makefile for command execution

---



### Prerequisites

Make sure you have the following installed on your system:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/)
- [Make](https://www.gnu.org/software/make/) (optional, for using the `Makefile`)

---

###  Installation and Launch

1. **Clone the repository**

   ```bash
   git clone https://github.com/your-username/your-repo-name.git
   cd your-repo-name

2. **Start the Docker containers**

   ```bash
   make uo
   
3. **Install PHP dependencies**

   ```bash
   make composer-install


###  Endpoint Examples

Route: http://localhost:8000/multiply

   ```bash
   GET /multiply
   curl -X GET http://localhost:8080/multiplyn \
   -H "Content-Type: application/json" \
   -d '{"numbers": [2, 3, 4, 5, 6]}'