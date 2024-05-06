const path = require("path");
const webpack = require("webpack");

module.exports = {
  mode: "development", // or 'production'
  entry: "./src/index.ts",
  output: {
    path: path.resolve(__dirname, "www", "build"),
    filename: "bundle.js",
  },
  module: {
    rules: [
      {
        test: /\.ts$/,
        loader: "@tsconfig/webpack-loader",
        options: {
          configFile: "tsconfig.json",
        },
      },
      {
        test: /\.css$/,
        use: ["style-loader", "css-loader"],
      },
    ],
  },
};
