import {onMounted, ref} from "vue";
import {ApiUrl} from "../../../../shared/constants/API_URL.js";

export function useGetAllBrackets() {
    const data = ref([]);
    const isLoading = ref(true);
    const error = ref('');

    onMounted(() => {
        isLoading.value = true;
        fetch(`${ApiUrl}/brackets`)
            .then(res => res.json())
            .then(res => data.value = res)
            .catch(() => error.value = "Произошла ошибка")
            .finally(() => isLoading.value = false)
    })

    return {
        data,
        isLoading,
        error
    }
}