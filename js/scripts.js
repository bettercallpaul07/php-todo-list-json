const { createApp } = Vue;

createApp({
    data() {
        return {
            apiUrl: './api.php',
            todolist: [],
        };
    },
    created() {
        axios
            .get(this.apiUrl)
            .then((response) => {
                this.todolist = response.data.todolist;
            });
    }
}).mount('#app');
