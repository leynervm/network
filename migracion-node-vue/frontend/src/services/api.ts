import axios from 'axios';
import { toast, alert } from '../utils/alerts.js';

export const api = axios.create({
  baseURL: import.meta.env.VITE_API_URL || 'http://localhost:4000/api',
  withCredentials: true,
  headers: {
    'Content-Type': 'application/json',
    Accept: 'application/json',
  },
});

api.interceptors.response.use(
  (response) => {
    // Si la respuesta incluye directivas de toast o alert automáticas
    if (response.data?.toast) {
      toast(response.data.toast.title, response.data.toast.icon);
    }
    if (response.data?.alert) {
      alert(response.data.alert.title, response.data.alert.text, response.data.alert.icon);
    }
    return response;
  },
  (error) => {
    const data = error.response?.data;
    if (data?.alert) {
      alert(data.alert.title, data.alert.text, data.alert.icon);
    } else if (data?.message) {
      toast(data.message, 'error');
    }

    if (error.response?.status === 401 && window.location.pathname !== '/login') {
      window.location.href = '/login';
    }

    return Promise.reject(error);
  }
);
