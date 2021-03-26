import javax.faces.application.FacesMessage;
import javax.faces.component.UIComponent;
import javax.faces.component.UIInput;
import javax.faces.context.FacesContext;
import javax.faces.validator.FacesValidator;
import javax.faces.validator.Validator;
import javax.faces.validator.ValidatorException;

@FacesValidator("senhaValidator")
public class SenhaValidator implements Validator {

  @Override
  public void validate(FacesContext context, UIComponent component, Object value)
    throws ValidatorException {
    String senha = value.toString();

    UIInput uiInputConfSenha = (UIInput) component
      .getAttributes()
      .get("confSenha");
    String confSenha = uiInputConfSenha.getSubmittedValue().toString();

    if (!senha.equals(confSenha)) {
      uiInputConfSenha.setValid(false);
      throw new ValidatorException(new FacesMessage("Senhas não conferem."));
    }
  }
}
