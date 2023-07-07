import axiosClient from "../axios";

export function login({ commit }, data) {


    return axiosClient.post('/login', data)
        .then(({ data }) => {

            commit('setUser', data.User);
            commit('setToken', data.Token);
            return data;
        })
}


// axiosClient.get('http://localhost:8000/sanctum/csrf-cookie').then(response => {
//     // Login...
// });
export function logout({ commit }) {

    return axiosClient.post('/logout')
        .then((responese) => {
            commit('SetToken', null);
            return responese;
        })
}
