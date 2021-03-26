import java.util.LinkedHashMap;
import java.util.Map;
import javax.enterprise.context.RequestScoped;
import javax.faces.validator.ValidatorException;
import javax.inject.Named;
import javax.validation.constraints.AssertTrue;
import javax.validation.constraints.Email;
import javax.validation.constraints.NotEmpty;
import javax.validation.constraints.Positive;

@Named
@RequestScoped
public class MeuForm {

  @NotEmpty(message = "Nome é campo obrigatório.")
  private String nome;

  @NotEmpty(message = "E-mail é campo obrigatório.")
  @Email(message = "E-mail inválido.")
  private String email;

  @NotEmpty(message = "Senha é campo obrigatório.")
  private String senha;

  @NotEmpty(message = "Confirmar senha é campo obrigatório.")
  private String confSenha;

  private Integer cidade;

  @Positive(message = "Idade deve ser um número inteiro maior ou igual a 0.")
  private Integer idade;

  private String comentarios;
  private String sexo;

  @AssertTrue(message = "Você precisa concordar com os termos de uso.")
  private Boolean termos;

  private static Map<String, Integer> cidades;
  private static Map<String, String> sexos;

  static {
    cidades = new LinkedHashMap<>();
    cidades.put("Florianópolis", 1);
    cidades.put("São José", 2);
    cidades.put("Outro", 99);

    sexos = new LinkedHashMap<>();
    sexos.put("Masculino", "m");
    sexos.put("Feminino", "f");
    sexos.put("Outro", "o");
  }

  public String getNome() {
    return nome;
  }

  public void setNome(String nome) {
    this.nome = nome;
  }

  public String getEmail() {
    return email;
  }

  public void setEmail(String email) {
    this.email = email;
  }

  public String getSenha() {
    return senha;
  }

  public void setSenha(String senha) {
    this.senha = senha;
  }

  public String getConfSenha() {
    return confSenha;
  }

  public void setConfSenha(String confSenha) {
    this.confSenha = confSenha;
  }

  public Integer getCidade() {
    return cidade;
  }

  public void setCidade(Integer cidade) {
    this.cidade = cidade;
  }

  public Integer getIdade() {
    return idade;
  }

  public void setIdade(Integer idade) {
    this.idade = idade;
  }

  public String getComentarios() {
    return comentarios;
  }

  public void setComentarios(String comentarios) {
    this.comentarios = comentarios;
  }

  public String getSexo() {
    return sexo;
  }

  public void setSexo(String sexo) {
    this.sexo = sexo;
  }

  public Boolean getTermos() {
    return termos;
  }

  public void setTermos(Boolean termos) {
    this.termos = termos;
  }

  public Map<String, Integer> getCidades() {
    return cidades;
  }

  public Map<String, String> getSexos() {
    return sexos;
  }
}
