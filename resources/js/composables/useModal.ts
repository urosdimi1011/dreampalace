// composables/useDialog.ts
import { reactive, ref } from 'vue'

export function useDialog() {
    const visible = ref(false)

    const dialog = reactive({
        isDialogOpen: false,
        dialogTitle: '',
        dialogComponent: null as any,
        dialogProps: {} as Record<string, any>
    })

    function openModal(component: any, title: string, props: Record<string, any>) {
        dialog.isDialogOpen = true
        dialog.dialogTitle = title
        dialog.dialogComponent = component
        dialog.dialogProps = props
    }

    function handleDialogUpdate(val: boolean) {
        if (!val && visible.value) return
        dialog.isDialogOpen = val
    }

    function updateLightboxState(val: boolean) {
        setTimeout(() => {
            visible.value = val
        }, 0)
    }

    return {
        dialog,
        visible,
        openModal,
        handleDialogUpdate,
        updateLightboxState
    }
}
