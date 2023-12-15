
## Maven commands

**Compilation**
```bash
chmod +x ./mvnw
./mvnw compile -Dmaven.test.skip=true
```


**Tests** (target/surefire-reports/)
```bash
chmod +x ./mvnw
./mvnw test
```


Generate a jar (target/projetcicd-0.0.1-SNAPSHOT.jar)
```bash
chmod +x ./mvnw
./mvnw package -Dmaven.test.skip=true
```


Generate Docker image :
```bash
docker build --tag projetcicd:latest .
```


Execute your app from your local Docker repository :
```bash
docker run --rm projetcicd:latest
```
