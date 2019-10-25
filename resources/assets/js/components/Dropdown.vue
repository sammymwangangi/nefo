<template>
  <div class="relative m-5">
    <button @click="isOpen = !isOpen" class="relative z-10 block h-8 w-8 rounded-full overflow-hidden border-2 border-white focus:outline-none focus:border-white">
      <img class="h-full w-full object-cover" src="/img/user.png" alt="Your avatar">
    </button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isOpen: false
    }
  },
  created() {
    const handleEscape = (e) => {
      if (e.key === 'Esc' || e.key === 'Escape') {
        this.isOpen = false
      }
    }
    document.addEventListener('keydown', handleEscape)
    this.$once('hook:beforeDestroy', () => {
      document.removeEventListener('keydown', handleEscape)
    })
  }
}
</script>