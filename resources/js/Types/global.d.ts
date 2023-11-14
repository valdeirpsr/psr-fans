import { Alpine } from "alpinejs";
import { Axios } from "axios";

declare global {
  interface Window {
    axios: Axios;
    Alpine: Alpine
  }
}
