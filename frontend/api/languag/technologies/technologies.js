import { apiUrl } from "../apiURL";

export default {
  async getTechnologies() {
    const technologies = await this.$axios.$get(`${apiUrl}api/technologies`);
    return technologies;
  }
};
