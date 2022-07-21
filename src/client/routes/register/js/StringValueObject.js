class StringValueObject {
  constructor(value, minL, maxL, name) {
    this.validate(value.trim(), minL, maxL, name);
    this.value = value.trim();
  }

  validate(value, minL, maxL, name) {
    if (value.length < minL || value.length > maxL) {
      throw new Error(`${name} must have more than ${minL} characters.`);
    }
  }
}
