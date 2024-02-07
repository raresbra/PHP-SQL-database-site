public class Animal {
    private int nrPicioare;

    public Animal(int nrPicioare) {
        this.nrPicioare = nrPicioare;
    }

    public int getNrPicioare() {
        return nrPicioare;
    }

    public void setNrPicioare(int nrPicioare) {
        this.nrPicioare = nrPicioare;
    }
}

public class Caine extends Animal {
    private String culoare;

    {
        // Bloc de inițializare la nivel de caine
        System.out.println("Bloc de initializare la nivel de caine");
    }

    public Caine(int nrPicioare, String culoare) {
        super(nrPicioare);
        this.culoare = culoare;
    }

    public Caine(String culoare) {
        super(4); // Presupunând că majoritatea câinilor au 4 picioare
        this.culoare = culoare;    
    }

    public void bark() {
        System.out.println("Ham!");
    }


    public String getCuloare() {
        return culoare;
    }

    public void setCuloare(String culoare) {
        this.culoare = culoare;
    }
}

public class CaineDeCurte extends Caine {
    private int lungimeCoada;

    public CaineDeCurte(int nrPicioare, String culoare, int lungimeCoada) {
        super(nrPicioare, culoare);
        this.lungimeCoada = lungimeCoada;
    }

    public CaineDeCurte(String culoare, int lungimeCoada) {
        super(culoare);
        this.lungimeCoada = lungimeCoada;
    }

    public int getLungimeCoada() {
        return lungimeCoada;
    }

    public void setLungimeCoada(int lungimeCoada) {
        this.lungimeCoada = lungimeCoada;
    }
}