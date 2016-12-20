export module QueryString {

  export function createFromObject(queryString: Dictionary<string>) {
    let string = "";
    for(var query in queryString) {
      if(string == '') {
        string += "?";
      }

      string += query + '=' + queryString[query] + '&';
    }

    return string.slice(0, -1);
  }
}
