import { ref, toRef, computed } from 'vue'

export function useGameDetailComposable(game) {
    const screenshots = toRef(game, 'screenshots')
    const scrollIndex = ref(0)
    const screenshotCount = computed(() => screenshots.value?.length ?? 0)
    const isFirst = computed(() => scrollIndex.value === 0)
    const isLast = computed(() => scrollIndex.value >= screenshotCount.value - 1)
    


    function nextScreenshot() {
        if (!isLast.value) {
            scrollIndex.value++
        }
    }

    function prevScreenshot() {
        if (!isFirst.value) {
            scrollIndex.value--
        }
    }

    return {
        scrollIndex,
        nextScreenshot,
        prevScreenshot,
        isFirst,
        isLast,
        screenshotCount,
    }
}