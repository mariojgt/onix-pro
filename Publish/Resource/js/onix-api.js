import axios from 'axios';

// Create an axios instance and set the base url to the api and export it
const token = import.meta.env.VITE_ONIX_API_KEY;

const api = axios.create({
    baseURL: '/onix-api/',
    headers: {
        'Authorization': 'Bearer ' + token,
        'Accept': 'application/json',
        'Content-Type': 'application/json',
    },
});

export default api;
