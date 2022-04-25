import axios from "axios";

export default {
    find(search) {
        return axios.get("/api/weather/find", {
            params: {
                q: search
            }
        });
    },
};