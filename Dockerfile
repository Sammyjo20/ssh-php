FROM ubuntu:24.04

# Install Go

RUN apt update && apt install golang git php php-cli sudo -y

RUN export PATH=$PATH:/usr/local/bin/go

# Copy our very basic script

COPY ./src/go/main.go .

RUN go mod init sammyjo20/jourminal

# Install Dependencies

RUN go get github.com/charmbracelet/log \
    github.com/charmbracelet/ssh \
    github.com/charmbracelet/wish \
    github.com/charmbracelet/wish/logging \
    github.com/creack/pty

# Build the image

RUN env go build main.go

# Expose Port 22

EXPOSE 22

ENTRYPOINT ["./main"]
