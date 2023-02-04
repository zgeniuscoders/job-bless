/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./views/*.php"],
  theme: {
    extend: {
      spacing: {
        300: "300px",
        400: "400px",
        900: "900px",
        600: "600px",
        60: "60px",
        "calc-300": "calc(100% - 300px)",
        "calc-active": "calc(100% - 70px)",
        active: "70px !important",
      },
      backgroundColor:{
        'bbb': "#CCA5B7"
      },
      minWidth:{
        30: "30px"
      },
      gridTemplateColumns:{
        'custom': '20vw auto 20vw',
        'custom-2': '20vw auto'
      }
    },
  },
  plugins: [],
};
