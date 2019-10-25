<template>
  <div id="app" class="antialiased text-gray-900">
    <div>
      <Dropdown/>
    </div>
  </div>
</template>

<script>
import Dropdown from './components/Dropdown'

export default {
  name: 'app',
  components: {
    Dropdown
  },
}
</script>