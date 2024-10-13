import {ref} from "vue";
import {ApiUrl} from "../../../shared/constants/API_URL.js";

export default function useCreateBracket() {
    const bracket = ref({
        string: '',
        success: false
    });
    const isLoading = ref(false);
    const error = ref('');

    async function createBracket(data) {

        if (!data.string) {
            error.value = "Поле не может быть пустым"
            return;
        }

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
                const success = await res.json();
                bracket.value.success = success.success;
                bracket.value.string = data.string;
            } else {
                error.value = (await res.json()).message;
            }
        } catch (e) {
            error.value = e;
            console.log(e)
        } finally {
            isLoading.value = false;
        }
    }

    return {
        data: bracket,
        isLoading,
        error,
        createBracket
    }
}