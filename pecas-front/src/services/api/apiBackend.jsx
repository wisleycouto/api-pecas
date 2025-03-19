import axios from 'axios';

const backendAPI = axios.create({
  baseURL: process.env.VITE_BASE_URL_BACKEND,
  responseType: 'json',
});

export default backendAPI;
