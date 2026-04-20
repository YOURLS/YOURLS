FROM mysql:8.0

RUN microdnf install -y \
    openssh-clients \
    sshpass \
    && microdnf clean all

WORKDIR /workspace
