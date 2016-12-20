import { Config } from "../config";
import * as EN from "./en.lang";

export const Langs = {
  "EN": EN.lang
};

export const CurrentLanguage = Langs[Config.language];
