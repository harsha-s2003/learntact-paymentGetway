/*
 * PHP Kit for Icici Merchant Solutions
 * Version: 1.0.1
 * This is validation file
 */
jQuery(document).ready(function () {
  $("input").on("focusout keyup", function () {
    if (!$(this).valid()) {
      return false;
    }
  });
  $("#saleApi, #refundApi, #saleStatusApi, #refundStatusApi").validate({
    rules: {
      TxnRefNo: {
        required: true,
        minlength: 1,
        maxlength: 40,
        pattern: /^(?!-)[a-zA-Z0-9-]*$/,
      },
      RefCancelId: {
        required: true,
        minlength: 1,
        maxlength: 40,
        pattern: /^[a-zA-Z0-9]*$/,
      },
      Amount: {
        required: true,
        minlength: 1,
        maxlength: 12,
        pattern: /^[1-9]\d*(\.\d+)?$/,
      },
      refund_amount: {
        required: true,
        minlength: 1,
        maxlength: 12,
        pattern: /^[1-9]\d*(\.\d+)?$/,
      },
      RetRefNo: {
        required: true,
        minlength: 18,
        maxlength: 18,
        pattern: /^[1-9]\d*$/,
      },
      Currency: {
        required: true,
        minlength: 3,
        maxlength: 3,
        pattern: /^[1-9]\d*$/,
      },
      MerchantId: {
        required: true,
        minlength: 15,
        maxlength: 15,
        pattern: /^[a-zA-Z0-9]*$/,
      },
      TerminalId: {
        required: true,
        minlength: 8,
        maxlength: 8,
        pattern: /^[a-zA-Z0-9]*$/,
      },
      TxnType: {
        required: true,
        minlength: 3,
        maxlength: 10,
        pattern: /^[a-zA-Z0-9]*$/,
      },
      OrderInfo: {
        minlength: 1,
        maxlength: 40,
        pattern: /^[a-zA-Z0-9\-]*$/,
      },
      Email: {
        minlength: 1,
        maxlength: 30,
        pattern:
          /^(?=.{1,64}@)[A-Za-z0-9_-]+(\.[A-Za-z0-9_-]+)*@[^-][A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,})$/,
      },
      Phone: {
        minlength: 10,
        maxlength: 10,
        pattern:
          /^(\+\d{1,3}( )?)?((\(\d{1,3}\))|\d{1,3})[- .]?\d{3,4}[- .]?\d{4}$/,
      },
      UDF01: {
        minlength: 1,
        maxlength: 500,
        pattern: /^[a-zA-Z0-9 ,/?:@&=+$_.!~*')(#-;}{\[\]<>]*$/,
      },
      UDF02: {
        minlength: 1,
        maxlength: 500,
        pattern: /^[a-zA-Z0-9 ,/?:@&=+$_.!~*')(#-;}{\[\]<>]*$/,
      },
      UDF03: {
        minlength: 1,
        maxlength: 500,
        pattern: /^[a-zA-Z0-9 ,/?:@&=+$_.!~*')(#-;}{\[\]<>]*$/,
      },
      UDF04: {
        minlength: 1,
        maxlength: 500,
        pattern: /^[a-zA-Z0-9 ,/?:@&=+$_.!~*')(#-;}{\[\]<>]*$/,
      },
      UDF05: {
        minlength: 1,
        maxlength: 500,
        pattern: /^[a-zA-Z0-9 ,/?:@&=+$_.!~*')(#-;}{\[\]<>]*$/,
      },
      UDF06: {
        minlength: 1,
        maxlength: 500,
        pattern: /^[a-zA-Z0-9 ,/?:@&=+$_.!~*')(#-;}{\[\]<>]*$/,
      },
      UDF07: {
        minlength: 1,
        maxlength: 500,
        pattern: /^[a-zA-Z0-9 ,/?:@&=+$_.!~*')(#-;}{\[\]<>]*$/,
      },
      UDF08: {
        minlength: 1,
        maxlength: 500,
        pattern: /^[a-zA-Z0-9 ,/?:@&=+$_.!~*')(#-;}{\[\]<>]*$/,
      },
      UDF09: {
        minlength: 1,
        maxlength: 500,
        pattern: /^[a-zA-Z0-9 ,/?:@&=+$_.!~*')(#-;}{\[\]<>]*$/,
      },
      UDF10: {
        minlength: 1,
        maxlength: 500,
        pattern: /^[a-zA-Z0-9 ,/?:@&=+$_.!~*')(#-;}{\[\]<>]*$/,
      },
      FirstName: {
        minlength: 1,
        maxlength: 30,
        pattern: /^[a-zA-Z0-9]*$/,
      },
      LastName: {
        minlength: 1,
        maxlength: 30,
        pattern: /^[a-zA-Z0-9]*$/,
      },
      Street: {
        minlength: 1,
        maxlength: 30,
        pattern: /^[a-zA-Z0-9 ,/?:@&=+$_.!~*')(#-;}{\[\]<>]*$/,
      },
      City: {
        minlength: 1,
        maxlength: 30,
        pattern: /^[a-zA-Z0-9](?:[a-zA-Z0-9\s]*[a-zA-Z0-9])?$/,
      },
      State: {
        minlength: 1,
        maxlength: 30,
        pattern: /^[a-zA-Z0-9](?:[a-zA-Z0-9\s]*[a-zA-Z0-9])?$/,
      },
      ZIP: {
        minlength: 6,
        maxlength: 6,
        pattern: /^[a-zA-Z0-9]*$/,
      },
    },
    messages: {
      TxnRefNo: {
        required: "Merchant Txn. Ref. No is required field",
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern:
          "This field must not start with a hyphen and should only contain letters, numbers, and hyphens.",
      },
      RefCancelId: {
        required: "RefCancelId is required field",
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern: "This field not allowed special characters.",
      },
      Amount: {
        required: "Amount is required field",
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern:
          "This field should start with a non-zero digit (1-9) followed by two or more digits (0-9) without any spaces or special characters.",
      },
      refund_amount: {
        required: "Amount is required field",
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern:
          "This field should start with a non-zero digit (1-9) followed by two or more digits (0-9) without any spaces or special characters.",
      },
      RetRefNo: {
        required: "RetRefNo is required field",
        minlength: $.validator.format("Enter {0} characters"),
        maxlength: $.validator.format("Enter {0} characters"),
        pattern: "This field allowed only numbers.",
      },
      Currency: {
        required: "Currency Code is required field",
        minlength: $.validator.format("Enter {0} characters"),
        maxlength: $.validator.format("Enter {0} characters"),
        pattern: "This field allowed only numbers.",
      },
      MerchantId: {
        required: "Merchant Id is required field",
        minlength: $.validator.format("Enter {0} characters"),
        maxlength: $.validator.format("Enter {0} characters"),
        pattern: "This field not allowed special characters.",
      },
      TerminalId: {
        required: "TerminalId is required field",
        minlength: $.validator.format("Enter {0} characters"),
        maxlength: $.validator.format("Enter {0} characters"),
        pattern: "This field not allowed special characters.",
      },
      TxnType: {
        required: "TxnType is required field",
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern: "This field not allowed special characters.",
      },
      OrderInfo: {
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern: "This field not allowed special characters.",
      },
      Email: {
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern: "Enter valid Email",
      },
      Phone: {
        minlength: $.validator.format("Enter {0} digits"),
        maxlength: $.validator.format("Enter {0} digits"),
        pattern: "Enter valid phone number",
      },
      UDF01: {
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern:
          "The input can contain letters (A-Z, a-z), digits (0-9), and the following special characters: , / ? : @ & = + $ _ . ! ~ * ' ) ( # - ; } { [ ] < >",
      },
      UDF02: {
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern:
          "The input can contain letters (A-Z, a-z), digits (0-9), and the following special characters: , / ? : @ & = + $ _ . ! ~ * ' ) ( # - ; } { [ ] < >",
      },
      UDF03: {
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern:
          "The input can contain letters (A-Z, a-z), digits (0-9), and the following special characters: , / ? : @ & = + $ _ . ! ~ * ' ) ( # - ; } { [ ] < >",
      },
      UDF04: {
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern:
          "The input can contain letters (A-Z, a-z), digits (0-9), and the following special characters: , / ? : @ & = + $ _ . ! ~ * ' ) ( # - ; } { [ ] < >",
      },
      UDF05: {
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern:
          "The input can contain letters (A-Z, a-z), digits (0-9), and the following special characters: , / ? : @ & = + $ _ . ! ~ * ' ) ( # - ; } { [ ] < >",
      },
      UDF06: {
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern:
          "The input can contain letters (A-Z, a-z), digits (0-9), and the following special characters: , / ? : @ & = + $ _ . ! ~ * ' ) ( # - ; } { [ ] < >",
      },
      UDF07: {
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern:
          "The input can contain letters (A-Z, a-z), digits (0-9), and the following special characters: , / ? : @ & = + $ _ . ! ~ * ' ) ( # - ; } { [ ] < >",
      },
      UDF08: {
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern:
          "The input can contain letters (A-Z, a-z), digits (0-9), and the following special characters: , / ? : @ & = + $ _ . ! ~ * ' ) ( # - ; } { [ ] < >",
      },
      UDF09: {
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern:
          "The input can contain letters (A-Z, a-z), digits (0-9), and the following special characters: , / ? : @ & = + $ _ . ! ~ * ' ) ( # - ; } { [ ] < >",
      },
      UDF10: {
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern:
          "The input can contain letters (A-Z, a-z), digits (0-9), and the following special characters: , / ? : @ & = + $ _ . ! ~ * ' ) ( # - ; } { [ ] < >",
      },
      FirstName: {
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern: "This field not allowed special characters.",
      },
      LastName: {
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern: "This field not allowed special characters.",
      },
      Street: {
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern: "This field not allowed special characters.",
      },
      City: {
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern:
          "Alphanumeric with optional space allowed but no leading or trailing spaces.",
      },
      State: {
        minlength: $.validator.format("Enter at least {0} characters"),
        maxlength: $.validator.format("Maximum {0} characters allowed"),
        pattern:
          "Alphanumeric with optional space allowed but no leading or trailing spaces.",
      },
      ZIP: {
        minlength: $.validator.format("Enter {0} characters"),
        maxlength: $.validator.format("Enter {0} characters"),
        pattern: "This field not allowed special characters.",
      },
    },
  });
});
