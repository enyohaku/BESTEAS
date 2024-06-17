module.exports = {
  content: ["./*.{html,js}", "./!(build|dist|.*)/**/*.{html,js}"],
  theme: {
    extend: {
      colors: {
        white: "#fff",
        gainsboro: "#d9d9d9",
        black: "#000",
        gray: "#0d0d0d",
      },
      spacing: {},
      fontFamily: {
        inter: "Inter",
      },
    },
    fontSize: {
      xs: "12px",
      inherit: "inherit",
    },
    screens: {
      mq409: {
        raw: "screen and (max-width: 409px)",
      },
      mq404: {
        raw: "screen and (max-width: 404px)",
      },
      mq333: {
        raw: "screen and (max-width: 333px)",
      },
    },
  },
  corePlugins: {
    preflight: false,
  },
};