import javax.faces.component.UIComponent;
import javax.faces.context.FacesContext;
import javax.faces.convert.Converter;
import javax.faces.convert.FacesConverter;
import org.apache.commons.text.StringEscapeUtils;

@FacesConverter("preProcessaConverter")
public class PreProcessaConverter implements Converter {

  @Override
  public String getAsString(FacesContext context, UIComponent component, Object value) {
    return value.toString();
  }

  @Override
  public Object getAsObject(FacesContext context, UIComponent component, String value) {
    return StringEscapeUtils.escapeHtml4(value.trim().replace("\\", ""));
  }
}
