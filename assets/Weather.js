import {createApp} from "vue";
import Weather from "./Weather/Weather";
import WeatherStore from "./Weather/store/Weather";
import Styles from './Weather/styles/app.scss'

let weather = createApp(Weather);
weather.use(WeatherStore);
weather.mount('#app-weather');
