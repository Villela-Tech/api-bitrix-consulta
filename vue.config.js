module.exports = {
    transpileDependencies: ["vuetify"],

    publicPath: process.env.BASE_URL,

    devServer: {
        disableHostCheck: Boolean(process.env.VUE_APP_DEVELOPMENT_SERVER),
        port: 8080,
        public: '0.0.0.0',
    },

    pluginOptions: {
        i18n: {
            locale: "br",
            fallbackLocale: "en",
            localeDir: "locales",
            enableInSFC: false
        }
    }
};
