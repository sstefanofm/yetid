class Password extends StringValueObject {
  constructor(value) {
    super(value, 8, 255, "Password");
  }
}
