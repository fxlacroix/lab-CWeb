import {createStore} from "vuex";
import Api from "../api/weather_api";

const Weather = createStore({
    state () {
        return {
            success: false,
            loader: false,
            message: "Veuillez renseigner une ville.",
            search: "",
            timeline: {
                location: {name:""},
                current: {
                    temperature: "",
                    condition: {text:""}
                },
                forecast: []
            }
        }
    },
    actions: {
        async find({ commit }, search ) {
            try {
                let response = await Api.find(search);
                return response.data;
            } catch (error) {
                return null;
            }
        },
    },
    mutations: {
        setSearch(state, search) {
            state.loader = true;
            state.success = false;
            state.message = "";
            state.search = search;
        },
        setSearchResults(state, searchResult) {
            state.success = searchResult.success;
            if(state.success) {
                state.timeline = searchResult.data;
            } else {
                console.error(searchResult.message);
                state.message = "Erreur lors de l'appel à weather-api. Vérifier le nom de la ville renseignée."
            }
            state.loader = false;
        },
    }
});

export default Weather;