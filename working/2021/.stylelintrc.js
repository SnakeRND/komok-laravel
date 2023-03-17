module.exports = {
  extends: "stylelint-config-standard",
  customSyntax: "postcss-scss",
  rules: {
    "at-rule-no-unknown": null,
    "no-descending-specificity": null,
    "selector-class-pattern": "[a-z][a-z0-9]*"
  }
};
