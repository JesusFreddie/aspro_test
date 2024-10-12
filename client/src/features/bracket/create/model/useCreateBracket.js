import {ref} from "vue";
import {ApiUrl} from "../../../../shared/constants/API_URL.js";

export default function useCreateBracket() {
    const isLoading = ref(false);
    const error = ref('');

    async function createBracket(data) {
        isLoading.value = true;
        try {
            const res = await fetch(`${ApiUrl}/brackets`, {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })

            if (res.ok) {
                console.log('asdasdasdd')
            } else {
                console.log("Что то пошо не так");
            }
        } catch (e) {
            error.value = e;
            console.log(e)
        } finally {
            isLoading.value = false;
        }
    }

    return {
        isLoading,
        error,
        createBracket
    }
}