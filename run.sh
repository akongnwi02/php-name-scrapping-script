#!/usr/bin/env bash
docker rm -f namesearch
echo "Building container"
docker build . -t namesearch
echo "Starting a new container in background"
docker run --name "namesearch" -d -v "$PWD":/app -i -t namesearch
echo "Done. Logging into container"
#!/usr/bin/env bash
docker exec -it namesearch /bin/bash
