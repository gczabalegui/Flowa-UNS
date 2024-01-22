const { defineConfig } = require('@vue/cli-service')

module.exports = defineConfig({
  transpileDependencies: true
})

// vue.config.js
module.exports = {
  // Opciones de configuración de Vue CLI
  devServer: {
    // Habilitar la recarga en caliente (Hot Module Replacement)
    hot: true,
  },
};



