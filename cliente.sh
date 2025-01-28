#!/bin/bash

# URL de la API a la que deseas enviar la solicitud
API_URL="http://localhost/api_log_json.php"

# JSON que se enviará
JSON_PAYLOAD='{
  "id": 1,
  "name": "International Inc Corporate Office",
  "location": {
    "lat": 51.5013673,
    "lng": -0.1440787
  },
  "type": "headquarter",
  "status": "1"
}'

# Enviar el JSON a la API usando curl
response=$(curl -s -X POST -H "Content-Type: application/json" -d "$JSON_PAYLOAD" "$API_URL")

# Mostrar la respuesta de la API
echo "Response from API: $response"
