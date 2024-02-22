import axios from 'axios';

const http = axios.create({
    baseURL: "http://localhost:8000/"
});

export default {
    Search(url) {
        return http.get(url)
    },
    SearchByName(name) {
        return http.get(`name/${name}`)
    },
    SearchByCode(code) {
        return http.get(`alpha/${code}`)
    },
}